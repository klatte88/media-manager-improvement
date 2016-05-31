 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
jimport('joomla.filesystem.file');

require_once __DIR__ . '/files.php';
 *
 * @since  3.6
	 * @var    int
	 * @since  3.6
	 * @var    array
	 * @since  3.6
	 * @var    MediaModelFileTypeInterface
	 * @since  3.6
	 * @var    MediaModelFileAdapterInterfaceAdapter
	 * @since  3.6
	/**
	 * Return the database identifier
	 *
	 * @return  int
	 *
	 * @since   3.6
	 */
	public function getId()
	{
		return $this->id;
	}

	 * @param  string $filePath
	 * @return  self
	 *
	 * @since   3.6
		if (strstr($filePath, COM_MEDIA_BASE) == false)
		{
			$filePath = COM_MEDIA_BASE . '/' . $filePath;
		}

		$filePath = realpath($filePath);

		$mediaBase     = str_replace(DIRECTORY_SEPARATOR, '/', JPATH_ROOT . '/images/');
			'name'          => basename($filePath),
			'title'         => basename($filePath),
			'path'          => $filePath,
			'extension'     => $fileExtension,
			'size'          => filesize($filePath),
			'icon_32'       => 'mime-icon-32/' . $fileExtension . '.png',
			'icon_16'       => 'mime-icon-16/' . $fileExtension . '.png',
			'file_adapter'  => 'local',
			'file_type'     => 'default',
		$this->setPropertiesByFileAdapter();
		return $this;
	 * @param   string $filePath
	 * @return  bool
	 *
	 * @since   3.6
		if (empty($storedFile))
			try
				$this->id = $this->create();
			catch (Exception $e)
			{
				// Do nothing
			}

			$this->fileProperties['id'] = $this->id;
		$this->id = $storedFile->id;

		$this->fileProperties['id']           = $this->id;
		$this->fileProperties['hash']         = $storedFile->md5sum;
		$this->fileProperties['file_adapter'] = $storedFile->adapter;

		// Check for hash to see if this entry needs updating
		if (empty($this->fileAdapter))
			return true;
		$this->fileAdapter->setFilePath($this->fileProperties['path']);

		if ($this->fileAdapter->getHash() != $this->fileProperties['hash'])
		{
			try
			{
				$this->update();
			}
			catch (Exception $e)
			{
				// Do nothing
			}
		}
	 * @param   string $filePath
	 *
	 * @return  bool|object
	 * @since   3.6
		$path     = str_replace(JPATH_ROOT . '/', '', dirname($filePath));
	 * @param   string $folder
	 * @return  array
	 *
	 * @since   3.6
			$files[$folder] = $this->getFilesModel()
				->getStoredFiles($folder);
	 * @return  bool|int
	 * @throw   Exception
	 * @since   3.6
		$user = JFactory::getUser();
		$date = JFactory::getDate();

		$path = str_replace(JPATH_ROOT . '/', '', dirname($this->fileProperties['path']));
		if ($this->fileAdapter instanceof MediaModelFileAdapterInterfaceAdapter)
			'filename'   => basename($this->fileProperties['path']),
			'path'       => $path,
			'md5sum'     => $hash,
			'user_id'    => $user->id,
			'created'    => $date->toSql(),
			'adapter'    => 'local',
			'published'  => 1,
			'ordering'   => 1,
		// Get the table
		$table = JTable::getInstance('File', 'MediaTable');

			throw new RuntimeException($table->getError());
		return JFactory::getDbo()->insertid();
	 * @return  bool
	 *
	 * @since   3.6
	public function update()
		$user = JFactory::getUser();
		$date = JFactory::getDate();

		$path = str_replace(JPATH_ROOT . '/', '', dirname($this->fileProperties['path']));
		if ($this->fileAdapter instanceof MediaModelFileAdapterInterfaceAdapter)
			'id'          => $this->id,
			'filename'    => basename($this->fileProperties['path']),
			'path'        => $path,
			'md5sum'      => $hash,
			'user_id'     => $user->id,
			'modified'    => $date->toSql(),
			'adapter'     => 'local',
			'published'   => 1,
			'ordering'    => 1,
		// Get the table 
		$table = JTable::getInstance('File', 'MediaTable');

			throw new RuntimeException($table->getError());
		}

		return $this->id;
	}
	/**
	 * Delete a file
	 *
	 * @return bool
	 * @throws Exception
	 */
	public function delete()
	{
		if (empty($this->fileProperties))
		{
		$fileName = $this->fileProperties['name'];
		$filePath = $this->fileProperties['path'];
		
		if ($fileName !== JFile::makeSafe($fileName))
		{
			// Filename is not safe
			$filename = htmlspecialchars($fileName, ENT_COMPAT, 'UTF-8');
			throw new Exception(JText::sprintf('COM_MEDIA_ERROR_UNABLE_TO_DELETE_FILE_WARNFILENAME', substr($filename, strlen(COM_MEDIA_BASE))));
		}

		if (!is_file($filePath))
		{
			return false;
		}

		// Trigger the onContentBeforeDelete event
		$fileObject = new JObject(array('filepath' => $filePath));
		$result = $this->triggerEvent('onContentBeforeDelete', array('com_media.file', &$fileObject));

		if (in_array(false, $result, true))
		{
			// There are some errors in the plugins
			$errors = $fileObject->getErrors();
			throw new Exception(JText::plural('COM_MEDIA_ERROR_BEFORE_DELETE', count($errors), implode('<br />', $errors)));
		}

		$rt = JFile::delete($fileObject->filepath);

		// Trigger the onContentAfterDelete event.
		$this->triggerEvent('onContentAfterDelete', array('com_media.file', &$fileObject));

		return $rt;
	 * @return  MediaModelFileAdapterInterfaceAdapter
	 *
	 * @since   3.6
		if ($this->fileAdapter instanceof MediaModelFileAdapterInterfaceAdapter)
		if (!isset($this->fileProperties['file_adapter']))
		$adapterFactory    = new MediaModelFileAdapter;
		$this->fileAdapter = $adapterFactory->getFileAdapter($this->fileProperties['file_adapter']);
	 * @return  MediaModelFileAdapterInterfaceAdapter
	 *
	 * @since   3.6
		if (!$this->fileAdapter instanceof MediaModelFileAdapterInterfaceAdapter)
		$typeFactory    = new MediaModelFileType;
		if (!$this->fileType instanceof MediaModelFileTypeInterface)
		{
			throw new RuntimeException(JText::_('JERROR_UNDEFINED') . ': ' . $this->fileProperties['path']);
		}

		$this->fileProperties['file_type'] = $this->fileType->getName();

	 *
	 * @return  void
	 *
	 * @since   3.6
			$properties           = $this->fileType->getProperties($this->fileProperties['path']);
	/**
	 * Merge file type specific properties with the generic file properties
	 *
	 * @return  void
	 *
	 * @since   3.6
	 */
	protected function setPropertiesByFileAdapter()
	{
		if (!$this->fileAdapter)
		{
			return;
		}

		$mimeType = $this->fileAdapter->getMimeType($this->fileProperties['path']);

		if (empty($mimeType))
		{
			return;
		}
		
		$this->fileProperties['mime_type'] = $mimeType;
	}

	/**
	 * Triggers the specified event
	 *
	 * @param string $eventName
	 * @param array  $eventArguments
	 */
	private function triggerEvent($eventName, $eventArguments)
	{
		JPluginHelper::importPlugin('content');
		$dispatcher = JEventDispatcher::getInstance();
		$dispatcher->trigger($eventName, $eventArguments);
	}

	 * @return  mixed
	 *
	 * @since   3.6
	 * @param  string $fileAdapter
	 * @param  string $filePath
	 * @return  $this
	 *
	 * @since   3.6
	public function setFileAdapter($fileAdapterName, $filePath = null)
		$adapterFactory    = new MediaModelFileAdapter;
		$this->fileAdapter = $adapterFactory->getFileAdapter($fileAdapterName);
	 * @return  mixed
	 *
	 * @since   3.6
	 * @param   mixed $fileType
	 * @return  $this
	 *
	 * @since   3.6
	 * @return  array
	 *
	 * @since   3.6
	 * @param   array $properties
	 *
	 * @return  void
	 *
	 * @since   3.6
	 * @return  MediaModelFiles
	 *
	 * @since   3.6
		return JModelLegacy::getInstance('files', 'MediaModel');
}