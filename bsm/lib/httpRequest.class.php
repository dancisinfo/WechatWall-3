<?php
/**
 * FileName: httpRequest.class.php
 * Discription: HTTP报文发送
 * ModifyHistory:
 * 1. 2015-02-02    20:57    Dreamshield
 * 创建源文件
 */

class httpRequest{
	private $userAgent = "Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/39.0.2171.65 Chrome/39.0.2171.65 Safari/537.36";
	private $header = array(
				'Accept:/*/',
				'Accept-Encoding:gzip, deflate, sdch',
				'Accept-Language:zh-CN,zh;q=0.8',
				'Connection:keep-alive',
				'Host:mp.weixin.qq.com',
				'Origin:https://mp.weixin.qq.com',
				'Referer:https://mp.weixin.qq.com/'
			);

	/**
	 * [postHttp: 发送HTTP post请求包]
	 * @param  [string]	      $url            post请求的url
	 * @param  [array]       $postData  post请求报文
	 * @return  [resource]  $result      请求的页面信息
	 */
	public function postHttp($url, $postData, $cookie) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
		curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_POST, 1); // 发送一个常规的POST请求
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $postData);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_COOKIE, $cookie); // 设置cookie
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$result = curl_exec($ch);

		if (curl_errno($ch)) {
			echo 'Errno'.curl_error($ch);
		}
		curl_close($ch);
		return $result;
	}

	/**
	 * [getHttp: 发送HTTP get请求包]
	 * @param [string]        $url        get请求的url
	 * @param [array]         $cookie  获取的cookie
	 * @return [resources] $result   请求的页面信息
	 */
	public function getHttp($url, $cookie) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
		curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HTTPGET, 1); // 发送Get请求
		curl_setopt($ch, CURLOPT_AUTOREFERER,1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_COOKIE, $cookie); // 设置cookie
		curl_setopt($ch, CURLOPT_ENCODING ,'gzip');
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$result = curl_exec($ch);

		if (curl_errno($ch)) {
			echo 'Errno'.curl_error($ch);
		}
		curl_close($ch);
		return $result;
	}
}
?>