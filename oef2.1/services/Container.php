<?php
class Container
{
    private $logfile;
    private $dbconfig;
    private $jsonfile;

    private $messageService;
    private $dbManager;
    private $logger;
    private $validator;
    private $loginChecker;

    private $JsonBlogService;
    private $DbBlogService;

    public function __construct( string $logfile, array $dbconfig, string $jsonfile)
    {
        $this->logfile = $logfile;
        $this->dbconfig = $dbconfig;
        $this->jsonfile = $jsonfile;
    }

    public function getMessageService()
    {
        if ( $this->messageService === null ) {
            $this->messageService = new MessageService();
        }

        return $this->messageService;
    }

    public function getLogger()
    {
        if ( $this->logger === null ) {
            $this->logger = new Logger( $this->logfile );
        }

        return $this->logger;
    }

    public function getDBManager()
    {
        if ( $this->dbManager === null ) {
            $this->dbManager = new DBManager( $this->getLogger(), $this->dbconfig );
        }

        return $this->dbManager;
    }

    public function getValidator()
    {
        if ( $this->validator === null ) {
            $this->validator = new Validator( $this->getMessageService(), $this->getDBManager() );
        }

        return $this->validator;
    }

    public function getLoginChecker()
    {
        if ( $this->loginChecker === null ) {
            $this->loginChecker = new LoginChecker( $this->getMessageService(), $this->getDBManager() );
        }

        return $this->loginChecker;
    }

    public function getJsonBlogService()
    {
        if ( $this->JsonBlogService === null ) {
            $this->JsonBlogService = new JsonBlogService($this->jsonfile);
        }

        return $this->JsonBlogService;
    }

    public function getDbBlogService()
    {
        if ( $this->DbBlogService === null ) {
            $this->DbBlogService = new DbBlogService($this->getDBManager());
        }

        return $this->DbBlogService;
    }

}