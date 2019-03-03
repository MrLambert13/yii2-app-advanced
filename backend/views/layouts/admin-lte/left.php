<aside class="main-sidebar">

  <section class="sidebar">


    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search..."/>
        <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
      </div>
    </form>
    <!-- /.search form -->

      <?= dmstr\widgets\Menu::widget(
          [
              'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
              'items' => [
                  ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                  ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                  ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                  ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                  [
                      'label' => 'Models',
                      'icon' => 'free-code-camp',
                      'url' => '#',
                      'items' => [
                          [
                              'label' => 'Users',
                              'icon' => 'user',
                              'items' => [
                                  ['label' => 'Show All', 'icon' => 'eye', 'url' => '/user/index',],
                                  ['label' => 'Create', 'icon' => 'plus', 'url' => '/user/create',],
                              ],
                          ],
                          [
                              'label' => 'Tasks',
                              'icon' => 'tasks',
                              'items' => [
                                  ['label' => 'Show All', 'icon' => 'eye', 'url' => '/task/index',],
                                  ['label' => 'Create', 'icon' => 'plus', 'url' => '/task/create',],
                              ],
                          ],
                          [
                              'label' => 'Project',
                              'icon' => 'product-hunt',
                              'items' => [
                                  ['label' => 'Show All', 'icon' => 'eye', 'url' => '/project/index',],
                                  ['label' => 'create', 'icon' => 'plus', 'url' => '/project/create',],
                              ],
                          ],
                      ],
                  ],
              ],
          ]
      ) ?>

  </section>

</aside>
