<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div href="#" class="brand-link" style="text-align: center;">
      <span class="brand-text ">DG_SHOPS GROUP</span>
    </div>
  

    <!-- image eet nom utilisateur-->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{url('public/assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <!-- tableau de bord-->
            <li class="nav-item">
                <a href="{{url ('admin/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Tableau de bord
                </p>
                </a>
            </li>


            <!-- Gestion des utilisateurs -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fas fa-user"></i>
                <p>
                  Utilisateurs
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="{{url('admin/admin/add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p>
                      Ajout des Utilisateurs
                    </p>
                  </a>
              </li> 
                <li class="nav-item">
                  <a href="{{url ('admin/admin/list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p>
                      Liste des Utilisateurs
                    </p>
                  </a>
              </li> 
              </ul>
            </li>
           

            <!-- Gestion des catégories de produits-->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Catégories
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="{{url ('admin/category/list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                      Liste des Catégories
                  </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/category/add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Ajout des Catégories
                  </p>
                  </a>
                </li>                  
              </ul>
            </li>


            <!-- Gestion des sous catégories de produits-->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Sous Catégories
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="{{url('admin/sub_category/add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Ajout des sous Catégories 
                  </p>
                  </a>
                </li>              
                <li class="nav-item">
                  <a href="{{url('admin/sub_category/list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Liste des sous Catégories
                  </p>
                  </a>
                </li>     
              </ul>
            </li>
            

            <!-- Gestion des marques-->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-hospital"></i>
                <p>
                  Marques
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="{{url ('admin/brand/list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Liste des Marques
                  </p>
                  </a>
                </li> 
                <li class="nav-item">
                  <a href="{{url('admin/brand/add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Ajout des Marques
                  </p>
                  </a>
                </li>                            
              </ul>
            </li>


              <!-- Gestion des couleurs-->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-hospital"></i>
                  <p>
                    Couleurs
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="{{url ('admin/color/list')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Liste des couleurs
                    </p>
                    </a>
                  </li> 
                  <li class="nav-item">
                    <a href="{{url('admin/color/add')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Ajout des couleurs
                    </p>
                    </a>
                  </li>                            
                </ul>
              </li>



              <!-- Gestion des produits-->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-hospital"></i>
                  <p>
                    Produits
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="{{url ('admin/product/list')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Liste des produits
                    </p>
                    </a>
                  </li> 
                  <li class="nav-item">
                    <a href="{{url('admin/product/add')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Ajout des Produits
                    </p>
                    </a>
                  </li>                            
                </ul>
              </li>


              <!-- Gestion des produits-->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-hospital"></i>
                  <p>
                    Codes de réduction
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="{{url ('admin/discount_code/list')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Liste des Codes de réduction
                    </p>
                    </a>
                  </li> 
                  <li class="nav-item">
                    <a href="{{url('admin/discount_code/add')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Ajout des Codes de réduction
                    </p>
                    </a>
                  </li>                            
                </ul>
              </li>

            <li class="nav-item">
              <a href="#" class="nav-link @if(Request::segment(2) == 'product') active @endif">
              <i class="nav-icon fas fa-hospital"></i>
              <p>
                  ................
              </p>
              </a>
          </li>  
            
            




          <!-- Déconnexion-->
          <li class="nav-item">
            <a href="{{url ('admin/logout')}}" class="nav-link active">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Se déconnecter
            </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
