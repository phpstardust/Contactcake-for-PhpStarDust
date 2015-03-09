# Contactcake for PhpStarDust
Create a contact form for CakePHP/PhpStarDust.

<h2>Requirements</h2>

HTTP Server. For example: Apache.
PHP 5.2.8 or greater.
CakePHP 2.5.1+

<h2>Dependencies</h2>

jQuery

<h2>Installation</h2>

- compiles the email file in app/Config/email.php (the name must be "default")
- upload plugin in the /app/Plugin/Contactcake folder
- activate the plugin in /app/Config/bootstrap.php
- set email in /app/Plugin/Contactcake/Config/bootstrap.php

CakePlugin::loadAll(array(
    'Contactcake' => array('bootstrap' => true, 'routes' => true)
));

<h3>In the controller</h3>

public $helpers = array('Contactcake.Contactcake');

<h3>In the View</h3>

echo $this->Contactcake->renderform();

<h2>License</h2>

MIT LICENSE

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
