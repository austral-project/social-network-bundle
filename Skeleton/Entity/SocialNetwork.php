##php##
/*
 * This file is autogenerate and part of the Austral SocialNetwork Bundle package.
 *
 * (c) Austral <support@austral.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Entity\Austral\SocialNetworkBundle;
use Austral\SocialNetworkBundle\Entity\SocialNetwork as BaseSocialNetwork;

use Austral\SocialNetworkBundle\Entity\Interfaces\SocialNetworkTranslateInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Austral SocialNetwork Entity.
 *
 * @author Matthieu Beurel <matthieu@austral.dev>
 *
 * @ORM\Table(name="austral_social_network")
 * @ORM\Entity(repositoryClass="Austral\SocialNetworkBundle\Repository\SocialNetworkRepository")
 * @ORM\HasLifecycleCallbacks
 */
class SocialNetwork extends BaseSocialNetwork
{
  public function __construct()
  {
      parent::__construct();
  }

  /**
   * @return SocialNetworkTranslateInterface
   */
  public function createNewTranslateByLanguage(): SocialNetworkTranslateInterface
  {
    $translate = new SocialNetworkTranslate();
    $translate->setMaster($this);
    $translate->setIsReferent(count($this->getTranslatesByLanguage()) > 0);
    $translate->setLanguage($this->getLanguageCurrent());
    $this->addTranslateByLanguage($translate);
    return $translate;
  }
}
