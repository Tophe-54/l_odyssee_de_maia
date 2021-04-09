<?php


namespace App\Controller;


use App\Entity\Album;
use App\Repository\AlbumRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlbumController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{


    /**
     * @var AlbumRepository
     */
    private $repository;

    public function __construct(AlbumRepository $repository)
    {

        $this->repository = $repository;
    }
    
    /**
     * @Route("/albums", name="album.index")
     * @return Response
     */
    public function index():Response
    {
        $albums = $this->repository->findByExampleField();

        return $this->render('pages/album/index.html.twig', [
            'current_menu'  => 'album.index',
            'albums'        => $albums
        ]);
    }

    /**
     * @Route("/albums/{slug}-{id}", name="album.show", requirements={"slug": "[a-z0-9\-]*"})
     * @return Response
     */
    public function show(Album $album, $slug): Response
    {
        if ($album->getSlug() !== $slug){
            return $this->redirectToRoute('album.show', [
                'id'    => $album->getId(),
                'slug'  => $album->getSlug()
            ], 301);
        }
        return $this->render('pages/album/show.html.twig', [
            'album'  => $album
        ]);
    }
}