<?php
/**
 * Created by PhpStorm.
 * User: alexdin
 * Date: 21.08.17
 * Time: 22:43
 */

namespace alexdin\filesession;

class Session extends \yii\web\Session
{

    /**
     * @param string $id session id key
     * @return bool
     */
    public function destroySession($id)
    {
        //save current session
        $sessionId = session_id();
        $this->close();
        $this->setId($id);
        $this->open();
        session_unset();
        session_destroy();
        $this->setId($sessionId);
        return true;
    }

    /** returned Array with session data. It is not standart method,
     * if you use other class , change mathod name in your code.
     * @param string $id session id key
     * @return array|true
     */

    public function getSessionData ($id)
    {

        $my_session = $_SESSION;
        $data = $this->readSession($id);
        session_decode($data);
        $result = $_SESSION;
        $_SESSION = $my_session;
        return $result;
    }

    /**
     * reading session file fom dir
     * @param string $id
     * @return string|null
     */

    public function readSession($id)
    {
        $file = session_save_path().'/'.$this->getSessionFileName($id);
        if(file_exists($file))
        {
            return @file_get_contents($file);
        }else{
            return null;
        }

    }

    /** returned session file name by session id (add prefix "sess_")
     * It looks like the default session files look like this ==> sess_yoursessionid
     * @param $id
     * @return string
     */

    public function getSessionFileName($id)
    {
        return 'sess_'.$id;
    }

}