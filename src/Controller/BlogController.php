<?php
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BlogController extends AbstractController
{
    /**
     * This route has a greedy pattern and is defined first.
     */
    #[Route('/blog/{slug}', name: 'blog_show')]
    public function show(string $slug): Response
    {
        // ...
    }

    #[Route('/blog', name: 'blog_list', priority: 2)]
    public function list(): Response
    {
        return new Response(
            '<html><body>Blog List</body></html>'
        );
    }
    
    #[Route('/blog/index/{page}', name: 'blog_index')]
    public function index(): Response
    {
        return new Response(
            '<html><body>Blog Index</body></html>'
        );
    }
    
    
}