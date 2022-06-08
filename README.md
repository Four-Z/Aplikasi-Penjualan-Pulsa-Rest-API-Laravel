# Aplikasi Penjualan Pulsa
Aplikasi Penjualan Pulsa berbasis REST API menggunakan framework Laravel

| Fitur | Keterangan |
| ------------- | ------------- |
| Mengecek Seluruh Daftar Harga Seluruh Provider | :white_check_mark:  |
| Mengecek Daftar Harga salah satu Provider | :white_check_mark: |
| Menambah, Mengedit, Menghapus Daftar Harga | :white_check_mark:  |
| Check Pulsa | :white_check_mark:  |
| Pembelian Pulsa | :white_check_mark:  |
| Notifikasi email ketika berhasil membeli pulsa | :x:  |


## Method GET 

###### Mengecek Seluruh Daftar Harga Seluruh Provider
```
http://127.0.0.1:8000/api/providers
```

###### Mengecek Daftar Harga salah satu Provider
```
http://127.0.0.1:8000/api/providers/{id_provider}
```

###### Mengecek Daftar Harga salah satu Provider
```
http://127.0.0.1:8000/api/pelanggan?id_provider={id_provider}&harga={harga yg ditambah}
```

###### Mengecek Pulsa
```
http://127.0.0.1:8000/api/pelanggan?no_hp={no_hp}
```
key: 
- no_hp

###### Laporan Penjualan
```
http://127.0.0.1:8000/api/penjualan
```


## Method POST

###### Menambah Daftar Harga
```
http://127.0.0.1:8000/api/providers?id_provider={id_provider}&harga={harga yg ditambah}
```
key: 
- id_provider
- harga

###### Membeli Pulsa
```
http://127.0.0.1:8000/api/pelanggan?no_hp={no_hp}&harga={jumlah pulsa yang dibeli berdasarkan daftar harga pulsa}
```
key: 
- no_hp
- harga


## Method PUT

###### Mengedit Daftar Harga
```
http://127.0.0.1:8000/api/providers/{id_daftar_harga}/?id_provider={id_provider}&harga={harga yg diubah}
```
key: 
- id_provider
- harga


## Method DELETE
```
http://127.0.0.1:8000/api/providers/{id_provider}
```
