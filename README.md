# JAPI-NoSQL #

_A Simple API Framework that accepts GET/POST parameters and returns JSON_

### Creating a Model ###

Create a directory in `app/var/db/<#model#>` with the following structure:

```
<#model#>/
├── idx/
│   └── name
├── int/
│   └── id
└── row/
```
_NOTE: ```name``` is an empty text file and ```id``` has your starting autoincrement id_

### Declare the Index ###

```php
class <#Model#>NameIdx extends Idx
{

  public function __construct()
  {
    $this->mdl = '<#model#>';
    $this->col = 'name';
    parent::__construct();
  }

}
```

### Declare the Model ###

```php
class <#Model#>Mdl extends Mdl
{

  protected static $shared;

  // return the singleton. Access with <#Model#>Mdl::shared();
  public static function shared()
  {
    if (!isset(self::$shared)) {
      self::$shared = new self();
    }
    return self::$shared;
  }

  public function __construct()
  {

    // set the name of this model
    $this->name = '<#model#>';

    $this->idx = new <#Model#>NameIdx();

    // parent constructor will calculate paths based on name
    parent::__construct();

  }

}
```

### Declare the Query Controller ###

class <#Model#>Qry
{

  public function __construct()
  {
    parent::__construct();

    $this->rep->model = '<#model#>';

    if ($a = Prs::param('a')) {
      switch ($a) {
        case 'create':
          $this->create();
          break;
        case 'read':
          $this->read();
          break;
        case 'update':
          $this->update();
          break;
        case 'delete':
          $this->delete();
          break;
        default:
          $this->dearth();
          break;
      }
    }

    else {
      $this->rep->action = 'none';
      $this->rep->message = 'No action specified';
    }

  }

  private function create() {
    $this->rep->action = 'create';
    // your create method
  }

  private function read() {
    $this->rep->action = 'read';
    // your read method
  }

  private function update() {
    $this->rep->action = 'update';
    // your update method
  }

  private function delete() {
    $this->rep->action = 'delete';
    // your delete method
  }

  private function dearth() {
    $this->rep->action = 'invalid';
    $this->rep->message = 'Invalid action';
    // your create method
  }

}
