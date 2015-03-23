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

use Xidea\Component\Dataflow\Manager\ImportManagerInterface,
    Xidea\Component\Dataflow\Model\ImportInterface;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class ImportManager implements ImportManagerInterface
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
     * Constructs a import manager.
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
    public function save(ImportInterface $import)
    {
        //$this->eventDispatcher->dispatch(ImportEvents::PRE_SAVE, new ImportEvent($import));
        
        $this->entityManager->persist($import);

        $this->entityManager->flush();
        
        //$this->eventDispatcher->dispatch(ImportEvents::POST_SAVE, new ImportEvent($import));

        return $import->getId();
    }
    
    public function update(ImportInterface $import)
    {  
        $this->entityManager->persist($import);

        $this->entityManager->flush();

        return $import->getId();
    }

    /**
     * {@inheritdoc}
     */
    public function delete(ImportInterface $import)
    {
        $this->entityManager->remove($import);
    }

}
