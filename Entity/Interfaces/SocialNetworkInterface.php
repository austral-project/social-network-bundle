<?php
/*
 * This file is part of the Austral SocialNetwork Bundle package.
 *
 * (c) Austral <support@austral.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Austral\SocialNetworkBundle\Entity\Interfaces;

/**
 * Austral SocialNetwork Interface.
 * @author Matthieu Beurel <matthieu@austral.dev>
 */
interface SocialNetworkInterface
{

  /**
   * @return string|null
   */
  public function getName(): ?string;

  /**
   * @param string|null $name
   *
   * @return SocialNetworkInterface
   */
  public function setName(?string $name): SocialNetworkInterface;

  /**
   * @return string|null
   */
  public function getKeyname(): ?string;

  /**
   * @return bool
   */
  public function getIsActive(): bool;

  /**
   * @param bool $isActive
   *
   * @return SocialNetworkInterface
   */
  public function setIsActive(bool $isActive): SocialNetworkInterface;

  /**
   * @param string|null $keyname
   *
   * @return SocialNetworkInterface
   */
  public function setKeyname(?string $keyname): SocialNetworkInterface;

  /**
   * @return string|null
   */
  public function getSimpleIcon(): ?string;

  /**
   * @param string|null $simpleIcon
   *
   * @return SocialNetworkInterface
   */
  public function setSimpleIcon(?string $simpleIcon): SocialNetworkInterface;

  /**
   * @return string|null
   */
  public function getPicto(): ?string;

  /**
   * @param string|null $picto
   *
   * @return SocialNetworkInterface
   */
  public function setPicto(?string $picto): SocialNetworkInterface;

  /**
   * @return string|null
   */
  public function getPictoReelname(): ?string;

  /**
   * @param string|null $pictoReelname
   *
   * @return SocialNetworkInterface
   */
  public function setPictoReelname(?string $pictoReelname): SocialNetworkInterface;

  /**
   * @return string|null
   */
  public function getPictoAlt(): ?string;

  /**
   * @param string|null $pictoAlt
   *
   * @return SocialNetworkInterface
   */
  public function setPictoAlt(?string $pictoAlt): SocialNetworkInterface;

}
