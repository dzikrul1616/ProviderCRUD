class ModelUser {
  String? id;
  String? nama;
  String? alamat;
  String? pendidikan;
  String? phone;
  String? createdAt;
  String? updatedAt;
  List<Pekerjaan>? pekerjaan;

  ModelUser({
    this.id,
    this.nama,
    this.alamat,
    this.pendidikan,
    this.phone,
    this.createdAt,
    this.updatedAt,
    this.pekerjaan,
  });

  ModelUser.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    nama = json['nama'];
    alamat = json['alamat'];
    pendidikan = json['pendidikan'];
    phone = json['phone'];
    createdAt = json['created_at'];
    updatedAt = json['updated_at'];
    if (json['pekerjaan'] != null) {
      pekerjaan = <Pekerjaan>[];
      json['pekerjaan'].forEach((v) {
        pekerjaan!.add(new Pekerjaan.fromJson(v));
      });
    }
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['id'] = this.id;
    data['nama'] = this.nama;
    data['alamat'] = this.alamat;
    data['pendidikan'] = this.pendidikan;
    data['phone'] = this.phone;
    data['created_at'] = this.createdAt;
    data['updated_at'] = this.updatedAt;
    if (this.pekerjaan != null) {
      data['pekerjaan'] = this.pekerjaan!.map((v) => v.toJson()).toList();
    }
    return data;
  }
}

class Pekerjaan {
  String? id;
  String? pekerjaan;
  String? userId;
  String? waktu;
  String? createdAt;
  String? updatedAt;

  Pekerjaan({
    this.id,
    this.pekerjaan,
    this.userId,
    this.waktu,
    this.createdAt,
    this.updatedAt,
  });

  Pekerjaan.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    pekerjaan = json['pekerjaan'];
    userId = json['user_id'];
    waktu = json['waktu'];
    createdAt = json['created_at'];
    updatedAt = json['updated_at'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['id'] = this.id;
    data['pekerjaan'] = this.pekerjaan;
    data['user_id'] = this.userId;
    data['waktu'] = this.waktu;
    data['created_at'] = this.createdAt;
    data['updated_at'] = this.updatedAt;
    return data;
  }
}
