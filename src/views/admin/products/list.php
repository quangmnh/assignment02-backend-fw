<?php
/**
 * @var array $products
 * @var array $pagination
 */
?>
<?php ob_start(); ?>

<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Products</h1>
    </div>
    <div class="col-auto">
        <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">
                    <form class="table-search-form row gx-1 align-items-center">
                        <div class="col-auto">
                            <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn app-btn-secondary">Search</button>
                        </div>
                    </form>

                </div><!--//col-->
                <div class="col-auto">

                    <select class="form-select w-auto">
                        <option selected="" value="option-1">All</option>
                        <option value="option-2">This week</option>
                        <option value="option-3">This month</option>
                        <option value="option-4">Last 3 months</option>

                    </select>
                </div>
                <div class="col-auto">
                    <a class="btn app-btn-secondary" href="#">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download mr-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"></path>
                            <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"></path>
                        </svg>
                        Download CSV
                    </a>
                </div>
            </div><!--//row-->
        </div><!--//table-utilities-->
    </div><!--//col-auto-->
</div>
<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">Product</th>
                                <th class="cell">Price</th>
                                <th class="cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($products as $product) : ?>
                        <tr>
                            <td class="cell"><a href="/admin/products/<?= $product['id'] ?>"><?= $product['product_name'] ?></a></td>
                            <td class="cell"><?= number_format($product['product_price'], 0, ',', '.') ?></td>
                            <td class="cell"><a class="btn-sm app-btn-secondary" href="/admin/products/<?= $product['id'] ?>">View</a></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div><!--//table-responsive-->

            </div><!--//app-card-body-->
        </div><!--//app-card-->
        <nav class="app-pagination">
            <ul class="pagination justify-content-center">
                <li class="page-item<?= !$pagination['prev'] ? ' disabled' : '' ?>" >
                    <a class="page-link" href="/admin/products?pageNumber=<?= $pagination['current'] - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <?php foreach($pagination['display'] as $page) : ?>
                    <?php if ($page == '...'): ?>
                        <li class="page-item"><a class="page-link disabled" href="">&hellip;</a></li>
                    <?php else : ?>
                        <li class="page-item<?= $pagination['current'] == $page ? ' active' : '' ?>"><a class="page-link" href="/admin/products?pageNumber=<?= $page ?>"><?= $page ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
                <li class="page-item<?= !$pagination['next'] ? ' disabled' : '' ?>" >
                    <a class="page-link" href="/admin/products?pageNumber=<?= $pagination['current'] + 1; ?>" tabindex="-1" aria-disabled="true">Next</a>
                </li>
            </ul>
        </nav><!--//app-pagination-->

    </div><!--//tab-pane-->
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../_layout.php';