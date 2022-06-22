<?
class MyMessages
{
    private $logger;

    public function __construct($logger)
    {
        $this->logger = $logger;
    }

    public function AddMessage($level, $message)
    {
        $this->logger->log($level, $message);
    }
}
?>