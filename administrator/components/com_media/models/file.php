 * @since 3.7.0
	 * @since 3.7.0
	 * @since 3.7.0
	 * @since 3.7.0
	 * @since 3.7.0
	/**
	 * Stored files
	 *
	 * @var null
	 * @since 3.7.0
	 */
	protected $storedFiles = null;

	 * @since 3.7.0
	 * @since 3.7.0
			return $this;
	 * @since 3.7.0
				$this->id   = $this->create();
				$this->resetStoredFiles();
				$storedFile = $this->getStoredFileByPath($filePath);
		}
		if (empty($storedFile))
		{
			throw new RuntimeException(JText::_('COM_MEDIA_ERROR_NO_FILE_IN_DB'));
	 * @since 3.7.0
		$path        = str_replace(JPATH_ROOT . '/', '', dirname($filePath));
		$filename    = basename($filePath);
		$storedFiles = $this->getStoredFiles($path);
		foreach ($storedFiles as $storedFile)
	/**
	 * Reset the listing of files stored in the database
	 *
	 * @since 3.7.0
	 */
	protected function resetStoredFiles()
	{
		$this->storedFiles = null;
	}

	 * @since 3.7.0
		if (!isset($this->storedFiles[$folder]))
			$this->storedFiles[$folder] = $this->getFilesModel()
		return $this->storedFiles[$folder];
	 * @throw   RuntimeException
	 * @since   3.7.0
	public function create()
		$table->save($data);
	 * @since 3.7.0
	 * @throws RuntimeException
	 * @since 3.7.0

			throw new RuntimeException(JText::sprintf('COM_MEDIA_ERROR_UNABLE_TO_DELETE_FILE_WARNFILENAME', substr($filename, strlen(COM_MEDIA_BASE))));
		$result     = $this->triggerEvent('onContentBeforeDelete', array('com_media.file', &$fileObject));
	/**
	 * Return the current file adapter object
	 *
	 * @return  mixed
	 * @since 3.7.0
	 */
	public function getFileAdapter()
	{
		return $this->fileAdapter;
	}

	/**
	 * Set the current file adapter object
	 *
	 * @param  string $fileAdapterName
	 * @param  string $filePath
	 *
	 * @return  $this
	 * @since 3.7.0
	 */
	public function setFileAdapter($fileAdapterName, $filePath = null)
	{
		$adapterFactory    = new MediaModelFileAdapter;
		$this->fileAdapter = $adapterFactory->getFileAdapter($fileAdapterName);
		$this->fileAdapter->setFilePath($filePath);

		return $this;
	}

	/**
	 * Return the current file type object
	 *
	 * @return  mixed
	 * @since 3.7.0
	 */
	public function getFileType()
	{
		return $this->fileType;
	}

	/**
	 * Set the current file type object
	 *
	 * @param   mixed $fileType
	 *
	 * @return  $this
	 * @since 3.7.0
	 */
	public function setFileType($fileType)
	{
		$this->fileType = $fileType;

		return $this;
	}

	/**
	 * Get the file properties
	 *
	 * @return  array
	 * @since 3.7.0
	 */
	public function getFileProperties()
	{
		return $this->fileProperties;
	}

	/**
	 * Set the file properties
	 *
	 * @param   array $properties
	 *
	 * @return  void
	 * @since 3.7.0
	 */
	public function setFileProperties($properties)
	{
		$this->fileProperties = $properties;
	}

	 * @since 3.7.0
	 * @since 3.7.0
	 * @since 3.7.0
	 * @since 3.7.0

	 *
	 * @since 3.7.0
	 * @since 3.7.0
	protected function getFilesModel()