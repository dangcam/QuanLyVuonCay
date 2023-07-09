<?php
namespace App\Models;
use CodeIgniter\Model;

class BaseModel extends Model
{
    public $session;
    private $messages;
    private $infos;
    private $warnings;
    private $errors;
    function __construct()
    {
        parent::__construct();
        $this->messages = array();
        $this->infos = array();
        $this->warnings = array();
        $this->errors = array();
        $this->session = session();
    }
    public function set_info($info)
    {
        $this->infos[] = $info;
        return $info;
    }
    public function set_warning($warning)
    {
        $this->warnings[] = $warning;
        return $warning;
    }
    public function set_error($error)
    {
        $this->errors[] = $error;
        return $error;
    }
    public function set_message($message)
    {
        $this->messages[] = $message;

        return $message;
    }
    public function get_infos()
    {
        $_output = '';
        foreach ($this->infos as $info) {
            $infoLang = lang($info) ? lang($info) : '##' . $info . '##';
            $_output .= '<li>'.$infoLang . '</li>';
        }
        return $_output;
    }
    public function get_warnings()
    {
        $_output = '';
        foreach ($this->warnings as $warning) {
            $warningLang = lang($warning) ? lang($warning) : '##' . $warning . '##';
            $_output .= '<li>'.$warningLang . '</li>';
        }
        return $_output;
    }
    public function get_errors()
    {
        $_output = '';
        foreach ($this->errors as $error) {
            $errorLang = lang($error) ? lang($error) : '##' . $error . '##';
            $_output .= '<li>'.$errorLang . '</li>';
        }
        return $_output;
    }
    public function get_messages()
    {
        $_output = '';
        foreach ($this->messages as $message) {
            $messageLang = lang($message) ? lang($message) : '##' . $message . '##';
            $_output .= '<li>' . $messageLang . '</li>';
        }

        return $_output;
    }
}
