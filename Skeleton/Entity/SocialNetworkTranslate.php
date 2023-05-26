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
use Austral\SocialNetworkBundle\Entity\SocialNetworkTranslate as BaseSocialNetworkTranslate;

use Doctrine\ORM\Mapping as ORM;

/**
 * Austral SocialNetwork Translate Entity.
 *
 * @author Matthieu Beurel <matthieu@austral.dev>
 *
 * @ORM\Table(name="austral_social_network_translate")
 * @ORM\Entity(repositoryClass="Austral\SocialNetworkBundle\Repository\SocialNetworkTranslateRepository")
 * @ORM\HasLifecycleCallbacks
 */
class SocialNetworkTranslate extends BaseSocialNetworkTranslate
{
  public function __construct()
  {
    parent::__construct();
  }
}
