# Simple PHP Logger class

### Usage

    $this->logger = new Logger();

      /** 
         * @param string $flag DEBUG,INFO or ERROR. 
         * @param string  $method Pass constant ___METHOD___ to get reporting className and Function.
         * @param string $entries Pass variables, etc..
      */

    $this->logger->log("INFO",__METHOD__,$someVar);

