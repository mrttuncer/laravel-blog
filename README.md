
# Laravel Blog Uygulaması

Bu proje, blogların listelendiği bir uygulamadır. Admin kullanıcıları CRUD işlemlerini gerçekleştirebilirken, diğer kullanıcılar sadece blogları görüntüleyebilir ve beğenebilir. Ayrıca, admin kullanıcıları, diğer kullanıcıların rollerini admin veya customer olarak güncelleyebilir.
Bir blogun birden fazlası kategorisi olabilir.

## Başlangıç

Proje için bir admin kullanıcısı oluşturmak için aşağıdaki komutu çalıştırabilirsiniz:

``
php artisan db:seed --class=AdminUserSeeder
``
Bunu yaptığınızda emaili admin@example.com parolası admin olan bir admin hesabı oluşturulur.
