<?php


class MessageService
{
    private $errors;
    private $input_errors;
    private $infos;

    public function __construct()
    {
        // berichten uit sessievariabelen inladen
        $this->errors = $_SESSION['errors'];
        $this->infos = $_SESSION['input_errors'];
        $this->input_errors = $_SESSION['msgs'];

        // deze sessievariabelen leegmaken
        $_SESSION['errors'] = [];
        $_SESSION['msgs'] = [];
        $_SESSION['input_errors'] = [];
    }

    public function CountErrors()
    {
        return count($this->errors);
    }

    public function CountInputErrors()
    {
        return count($this->input_errors);
    }

    public function CountInfos()
    {
        return count($this->infos);
    }

    public function CountNewErrors()
    {
        return count($_SESSION['errors']);
    }

    public function CountNewInputErrors()
    {
        return count($_SESSION['input_errors']);
    }

    public function CountNewInfos()
    {
        return count($_SESSION['msgs']);
    }

    public function GetInputErrors()
    {
        if ($this->CountInputErrors() > 0) return $this->input_errors;
        return null;
    }

    public function AddMessage($type, $msg, $key = null)
    {
        if ($type === 'input_error') {
            $_SESSION['input_errors'][$key] = $msg;
        } else if ($type === 'info') {
            $_SESSION['msgs'][] = $msg;
        } else if ($type === 'error') {
            $_SESSION['errors'][] = $msg;
        }
    }

    public function ShowErrors()
    {
        foreach ($this->errors as $error) {
            print $error;
        }
    }

    public function ShowInfos()
    {
        foreach ($this->infos as $info) {
            echo "halloooo";
            echo '<div class="msgs">'.$info.'</div>';
        }
    }
}