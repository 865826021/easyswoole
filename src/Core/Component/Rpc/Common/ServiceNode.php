<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/4/30
 * Time: 下午1:47
 */

namespace EasySwoole\Core\Component\Rpc\Common;
use EasySwoole\Core\Component\Cluster\Cluster;
use EasySwoole\Core\Component\Spl\SplBean;


class ServiceNode extends SplBean
{
    protected $serverId;
    protected $serviceName;
    protected $address = '127.0.0.1';
    protected $port;
    protected $lastHeartBeat;
    protected $encryptToken = null;

    /**
     * @return mixed
     */
    public function getServerId()
    {
        return $this->serverId;
    }

    /**
     * @param mixed $serverId
     */
    public function setServerId($serverId)
    {
        $this->serverId = $serverId;
    }

    /**
     * @return mixed
     */
    public function getServiceName()
    {
        return $this->serviceName;
    }

    /**
     * @param mixed $serviceName
     */
    public function setServiceName($serviceName)
    {
        $this->serviceName = $serviceName;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param mixed $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return mixed
     */
    public function getLastHeartBeat()
    {
        return $this->lastHeartBeat;
    }

    /**
     * @param mixed $lastHeartBeat
     */
    public function setLastHeartBeat($lastHeartBeat)
    {
        $this->lastHeartBeat = $lastHeartBeat;
    }

    /**
     * @return null
     */
    public function getEncryptToken()
    {
        return $this->encryptToken;
    }

    /**
     * @param null $encryptToken
     */
    public function setEncryptToken($encryptToken): void
    {
        $this->encryptToken = $encryptToken;
    }


    protected function initialize(): void
    {
        if(empty($this->serverId)){
            $this->serverId = Cluster::getInstance()->currentNode()->getNodeId();
        }
    }
}