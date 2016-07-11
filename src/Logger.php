<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/11 0011
 * Time: 下午 10:30
 */
class Logger
{
	private $hLogFile;
	private $logLevel;

	const DEBUG = 100;
	const INFO = 75;
	const NOTICE = 50;
	const WARNING = 25;
	const ERROR = 10;
	const CRITICAL = 5;

	private function __construct()
	{
		$cfg = Config::getConfig();

		$this->logLevel = isset($cfg["LOGGER_LEVEL"]) ?
								$cfg["LOGGER_LEVEL"] :
								lOGGER::INFO;

		if(!(isset($cfg["LOGGER_FILE"]) && strlen($cfg["LOGGER_FILE"]))){
			throw new \Exception("No log file path");
		}

		$logpath = $cfg["LOGGER_FILE"];

		$this->hLogFile = @fopen($logpath,"a+");

		if(!is_resource($this->hLogFile)){
			throw new \Exception("This specified log file {$logpath} conld not be opened");
		}

		//stream_encoding($this->hLogFile,'iso-8859-1');
	}

	public function __destruct()
	{
		// TODO: Implement __destruct() method.
		if(is_resource($this->hLogFile)){
			fclose($this->hLogFile);
		}
	}

	public static function getInstance(){

		static $objLog;

		if(!isset($objLog)){
			$objLog = new Logger();
		}

		return $objLog;
	}

	public function logMessage($msg,$logLevel = Logger::INFO,$module=null){

		if($logLevel > $this->logLevel){
			return;
		}

		date_default_timezone_set("Asia/ShangHai");

		$time = strftime('%x %X',time());
		$msg = str_replace(["\t","\n"]," ",$msg);

		$strLogLevel = $this->levelToString($logLevel);

		if(isset($module)){
			$module = str_replace(["\t","\n"]," ",$module);
		}

		$logLine = "$time\t$strLogLevel\t$msg\t$module\n";
		fwrite($this->hLogFile,$logLine);
	}

	public static function levelToString($logLevel){
		switch($logLevel){
			case Logger::DEBUG:
				return 'Logger::DEBUG';
				break;
			case Logger::INFO:
				return 'Logger::INFO';
				break;
			case Logger::WARNING:
				return 'Logger::WARNING';
				break;
			case Logger::ERROR:
				return 'Logger::ERROR';
				break;
			case Logger::NOTICE:
				return 'Logger::NOTICE';
				break;
			case Logger::CRITICAL:
				return 'Logger::CRITICAL';
				break;
			default:
				return 'unknown';
				break;

		}
	}
}