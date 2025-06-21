
<nav aria-label="Page navigation">
  <ul class="pagination justify-content-center">
    
    <!-- Tombol Previous -->
    <?php if ($pager->hasPrevious()): ?>
      <li class="page-item">
        <a class="page-link" href="<?= $pager->getPreviousPage() ?>" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>
    <?php endif; ?>

    <!-- Link Halaman -->
    <?php foreach ($pager->links() as $link): ?>
      <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
        <a class="page-link" href="<?= $link['uri'] ?>">
          <?= $link['title'] ?>
        </a>
      </li>
    <?php endforeach; ?>

    <!-- Tombol Next -->
    <?php if ($pager->hasNext()): ?>
      <li class="page-item">
        <a class="page-link" href="<?= $pager->getNextPage() ?>" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    <?php endif; ?>

  </ul>
</nav>

