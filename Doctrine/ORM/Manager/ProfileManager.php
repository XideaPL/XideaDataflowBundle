<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\DataflowBundle\Doctrine\ORM\Manager;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

use Doctrine\ORM\EntityManager;

use Xidea\Component\Dataflow\Manager\ProfileManagerInterface,
    Xidea\Component\Dataflow\Model\ProfileInterface;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class ProfileManager implements ProfileManagerInterface
{
    /*
     * @var EntityManager
     */
    protected $entityManager;
    
    /*
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * Constructs a profile manager.
     *
     * @param EntityManager The entity manager
     */
    public function __construct(EntityManager $entityManager, EventDispatcherInterface $eventDispatcher)
    {
        $this->entityManager = $entityManager;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * {@inheritdoc}
     */
    public function save(ProfileInterface $profile)
    {
        //$this->eventDispatcher->dispatch(ProfileEvents::PRE_SAVE, new ProfileEvent($profile));
        
        $this->entityManager->persist($profile);

        $this->entityManager->flush();
        
        //$this->eventDispatcher->dispatch(ProfileEvents::POST_SAVE, new ProfileEvent($profile));

        return $profile->getId();
    }
    
    public function update(ProfileInterface $profile)
    {  
        $this->entityManager->persist($profile);

        $this->entityManager->flush();

        return $profile->getId();
    }

    /**
     * {@inheritdoc}
     */
    public function delete(ProfileInterface $profile)
    {
        $this->entityManager->remove($profile);
    }

}
