<?php
/*
 * GWTPHP is a port to PHP of the GWT RPC package.
 * 
 * <p>This framework is based on GWT (see {@link http://code.google.com/webtoolkit/ gwt-webtoolkit} for details).</p>
 * <p>Design, strategies and part of the methods documentation are developed by Google Team  </p>
 * 
 * <p>PHP port, extensions and modifications by Rafal M.Malinowski. All rights reserved.<br>
 * Additional modifications, GWT generators and linkers by Yifei Teng. All rights reserved.<br>
 * For more information, please see {@link https://github.com/tengyifei/gwtphp}</p>
 * 
 * 
 * <p>Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at</p>
 * 
 * {@link http://www.apache.org/licenses/LICENSE-2.0 http://www.apache.org/licenses/LICENSE-2.0}
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

/**
 * @package gwtphp.rpc.impl
 */

/**
 * Base class for the client and server serialization streams. This class
 * handles the basic serialization and desirialization formatting for primitive
 * types since these are common between the reader and the writer.
 */
abstract class AbstractSerializationStream {

	/**
	 *
	 * @var int
	 */
	public static $SERIALIZATION_STREAM_FLAGS_NO_TYPE_VERSIONING = 1;
	/**
	 * 
	 * @var int
	 */
	public static $SERIALIZATION_STREAM_VERSION = 7;

	function __construct() {

	}

	/**
   * The last legacy stream version which does not use a
   * {@link com.google.gwt.user.server.rpc.SerializationPolicy SerializationPolicy}.
   * @var int
   */
	public static $SERIALIZATION_STREAM_VERSION_WITHOUT_SERIALIZATION_POLICY = 2;
	/**
	 * 
	 * @var int
	 */
	private $flags = 0;
	/**
	 * $SERIALIZATION_STREAM_VERSION
	 * @var int
	 */
	private $version = 7;

	/**
	 * 
	 * @param int $flags
	 * @return void
	 */
	public final function addFlags($flags) {
		$this->flags |= flags;
	}

	/**
	 * @return int
	 */
	public final function getFlags() {
		return $this->flags ;
	}

	/**
	 * @return int
	 */
	public final function getVersion() {
		return $this->version;
	}

	/**
	 * 
	 * @param int $flags
	 * @return void
	 */
	public final function setFlags($flags) {
		$this->flags = $flags;
	}

	/**
	 * @return boolean
	 */
	public final function shouldEnforceTypeVersioning() {
		return ($this->flags & AbstractSerializationStream::$SERIALIZATION_STREAM_FLAGS_NO_TYPE_VERSIONING) == 0;
	}

	/**
   * Returns <code>true</code> if this stream encodes information which can be
   * used to lookup a {@link com.google.gwt.user.server.rpc.SerializationPolicy}.
   * 
   * @return boolean <code>true</code> if this stream encodes information which can be
   *         used to lookup a <code>SerializationPolicy</code>
   */
	protected function hasSerializationPolicyInfo() {
		return $this->getVersion() > AbstractSerializationStream::$SERIALIZATION_STREAM_VERSION_WITHOUT_SERIALIZATION_POLICY;
	}

	/**
	 * 
	 * @param int $flags
	 * @return void
	 */
	protected final function setVersion($version) {
		$this->version = $version;
	}
}

?>