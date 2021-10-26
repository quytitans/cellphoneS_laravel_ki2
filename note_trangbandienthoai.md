- Brand
+ integer: id
+ string: name
+ text: description

- RAM
+ integer: id
+ integer: RAM
+ string: note


- Type
+ integer: id
+ integer: typeMobile // android, iphone(IOS), điện thoại phổ thông
+ string: note

-SSD
+ integer: id
+ integer: SSD
+ string: note


-Screen Size
+ integer: id
+ integer: screenSize
+ string: note



- Mobile:
+ integer: id
+ integer: brandID
+ string: name
+ string: thumbnail
+ double: price
+ string: type // android, iphone(IOS), điện thoại phổ thông
+ integer: Ram
+ string: CPU
+ integer: SSDmemory
+ integer: screenSize
+ status:                                   <option value="1">Sắp về hàng</option>
                                          <option value="2">Đang bán</option>
                                          <option value="3">Hết hàng</option>
                                          <option value="4">Nhận pre-order</option>
