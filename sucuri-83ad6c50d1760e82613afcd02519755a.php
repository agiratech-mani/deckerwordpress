<?php
/* Sucuri integrity monitor
 * Integrity checking and server side scanning.
 *
 * Copyright (C) 2010, 2011, 2012 Sucuri, LLC
 * http://sucuri.net
 * Do not distribute or share.
 */

$MYMONITOR = "monitor21";
$my_sucuri_encoding = "



LyogU3VjdXJpIGludGVncml0eSBtb25pdG9yIC4gCiAqIENvbm5lY3RzIGJhY2sgaG9tZS4KICog
Q29weXJpZ2h0IChDKSAyMDEwLTIwMTMgU3VjdXJpLCBMTEMKICogRG8gbm90IGRpc3RyaWJ1dGUg
b3Igc2hhcmUuCiAqLwoKCiRTVUNVUklQV0QgPSAiNTM1ZTI2ZWIwZjMzMjRlODA1NmZlNjk1NDk3
NmIwNGM2MmViOTc3ZjJjYzUxIjsKCgppZihpc3NldCgkX0dFVFsndGVzdCddKSkKewogICAgZWNo
byAiT0s6IFN1Y3VyaTogRm91bmRcbiI7CiAgICBleGl0KDApOwp9CgoKCi8qIFZhbGlkIGFyZ3Vt
ZW50LiAqLwppZighaXNzZXQoJF9HRVRbJ3J1biddKSkKewogICAgZXhpdCgwKTsKfQoKCi8qIE11
c3QgaGF2ZSBhbiBJUCBhZGRyZXNzLiAqLwppZighaXNzZXQoJF9TRVJWRVJbJ1JFTU9URV9BRERS
J10pKQp7CiAgICBleGl0KDApOwp9Cgokb3JpZ3JlbW90ZWlwID0gJF9TRVJWRVJbJ1JFTU9URV9B
RERSJ107CgovKiBJZiBjb21pbmcgZnJvbSBjbG91ZGZsYXJlOiAqLwppZihpc3NldCgkX1NFUlZF
UlsnSFRUUF9DRl9DT05ORUNUSU5HX0lQJ10pKQp7CiAgICAkX1NFUlZFUlsnUkVNT1RFX0FERFIn
XSA9ICRfU0VSVkVSWydIVFRQX0NGX0NPTk5FQ1RJTkdfSVAnXTsKfQovKiBDbG91ZFByb3h5IGhl
YWRlcnMuICovCmVsc2UgaWYoaXNzZXQoJF9TRVJWRVJbJ0hUVFBfWF9TVUNVUklfQ0xJRU5USVAn
XSkpCnsKICAgICRfU0VSVkVSWydSRU1PVEVfQUREUiddID0gJF9TRVJWRVJbJ0hUVFBfWF9TVUNV
UklfQ0xJRU5USVAnXTsKfQovKiBNb3JlIGdhdGV3YXkgcmVxdWVzdHMuICovCmVsc2UgaWYoaXNz
ZXQoJF9TRVJWRVJbJ0hUVFBfWF9PUklHX0NMSUVOVF9JUCddKSkKewogICAgJF9TRVJWRVJbJ1JF
TU9URV9BRERSJ10gPSAkX1NFUlZFUlsnSFRUUF9YX09SSUdfQ0xJRU5UX0lQJ107Cn0KZWxzZSBp
Zihpc3NldCgkX1NFUlZFUlsnSFRUUF9DTElFTlRfSVAnXSkpCnsKICAgICRfU0VSVkVSWydSRU1P
VEVfQUREUiddID0gJF9TRVJWRVJbJ0hUVFBfQ0xJRU5UX0lQJ107Cn0KLyogUHJveHkgcmVxdWVz
dHMuICovCmVsc2UgaWYoaXNzZXQoJF9TRVJWRVJbJ0hUVFBfVFJVRV9DTElFTlRfSVAnXSkpCnsK
ICAgICRfU0VSVkVSWydSRU1PVEVfQUREUiddID0gJF9TRVJWRVJbJ0hUVFBfVFJVRV9DTElFTlRf
SVAnXTsKfQovKiBQcm94eSByZXF1ZXN0cy4gKi8KZWxzZSBpZihpc3NldCgkX1NFUlZFUlsnSFRU
UF9YX1JFQUxfSVAnXSkpCnsKICAgICRfU0VSVkVSWydSRU1PVEVfQUREUiddID0gJF9TRVJWRVJb
J0hUVFBfWF9SRUFMX0lQJ107Cn0KLyogTW9yZSBnYXRld2F5IHJlcXVlc3RzLiAqLwplbHNlIGlm
KGlzc2V0KCRfU0VSVkVSWydIVFRQX1hfRk9SV0FSREVEX0ZPUiddKSkKewogICAgJF9TRVJWRVJb
J1JFTU9URV9BRERSJ10gPSAkX1NFUlZFUlsnSFRUUF9YX0ZPUldBUkRFRF9GT1InXTsKfQoKCiRt
eWlwbGlzdCA9IGFycmF5KAonOTcuNzQuMTI3LjE3MScsCic2OS4xNjQuMjAzLjE3MicsCicxNzMu
MjMwLjEyOC4xMzUnLAonNjYuMjI4LjM0LjQ5JywKJzY2LjIyOC40MC4xODUnLAonNTAuMTE2LjMu
MTcxJywKJzUwLjExNi4zNi45MicsCicxOTguNTguOTYuMjEyJywKJzUwLjExNi42My4yMjEnLAon
MTkyLjE1NS45Mi4xMTInLAonMTkyLjgxLjEyOC4zMScsCicxOTguNTguMTA2LjI0NCcsCicxMDQu
MjM3LjE0My4yNDInLAonMTA0LjIzNy4xMzkuMjI3JywKJzI2MDA6M2MwMDo6ZjAzYzo5MWZmOmZl
YWU6ZTEwNCcsCicyNjAwOjNjMDA6OmYwM2M6OTFmZjpmZTg0OmUyNzUnLAonMjYwMDozYzAzOjpm
MDNjOjkxZmY6ZmVlNDpjOWYwJywKJzI2MDA6M2MwMjo6ZjAzYzo5MWZmOmZlZTQ6Yzk5OCcsCicy
NjAwOjNjMDA6OmYwM2M6OTFmZjpmZTg0OmUyMTgnLAonMjYwMDozYzAyOjpmMDNjOjkxZmY6ZmVk
Zjo1OGM2JywKJzI2MDA6M2MwMjo6ZjAzYzo5MWZmOmZlZGY6NTgzNScsCicyNjAwOjNjMDM6OmYw
M2M6OTFmZjpmZWRmOjZhN2EnLAonZmU4MDo6ZmNmZDphZGZmOmZlZTY6ODA4NycsCicyNjAwOjNj
MDM6OmYwM2M6OTFmZjpmZTcwOjM2Y2UnLAonMjYwMDozYzAyOjpmMDNjOjkxZmY6ZmU3MDpmMTJk
JywKJzI2MDA6M2MwMTo6ZjAzYzo5MWZmOmZlNzA6NTJiYicsCic1MC4xMTYuMzYuOTMnLAoiMTky
LjE1NS45NS4xMzkiLAoiMjYwMDozYzAyOjpmMDNjOjkxZmY6ZmU2OTo0YjY2IiwKIjI2MDA6M2Mw
MDo6ZjAzYzo5MWZmOmZlNzA6NTIxMyIsCiIyNjAwOjNjMDM6OmYwM2M6OTFmZjpmZWRiOmI5Y2Ui
LAoiMjMuMjM5LjkuMjI3IiwKIjE5OC41OC4xMTIuMTAzIiwKIjE5Mi4xNTUuOTQuNDMiLAoiMTYy
LjIxNi4xNi4zMyIsCiI0NS43OS4yMTAuNTciLAoiNDUuMzMuNzYuMTciLAoiMjYwMDozYzAwOjpm
MDNjOjkxZmY6ZmU2ZTphMDQ2IiwKIjI2MDA6M2MwMjo6ZjAzYzo5MWZmOmZlNmU6YTBkZCIsCiIy
NjAwOjNjMDM6OmYwM2M6OTFmZjpmZTZlOmEwYWMiLAoiMTczLjIzMC4xMzMuMTY0IiwKIjI2MDA6
M2MwMjo6ZjAzYzo5MWZmOmZlOWI6Y2NhYyIsCiI2OS4xNjQuMjE5LjQ1IiwKIjI2MDA6M2MwMzo6
ZjAzYzo5MWZmOmZlNTk6ZjFmIiwKIjQ1Ljc5LjIwNy4xMjciLAoiMjYwMDozYzAyOjpmMDNjOjkx
ZmY6ZmU1OTpmYmIiLCAKIjY5LjE2NC4yMTEuMzciLCAKIjI2MDA6M2MwMzo6ZjAzYzo5MWZmOmZl
NTk6ZjUxIiwKIjk2LjEyNi4xMTcuMjAiLAoiMjYwMDozYzAwOjpmMDNjOjkxZmY6ZmU1OTpmODQi
LCAKKTsKCgokaXBtYXRjaGVzID0gMDsKCmZvcmVhY2goJG15aXBsaXN0IGFzICRteWlwKQp7CiAg
ICBpZihzdHJwb3MoJF9TRVJWRVJbJ1JFTU9URV9BRERSJ10sICRteWlwKSAhPT0gRkFMU0UpCiAg
ICB7CiAgICAgICAgJGlwbWF0Y2hlcyA9IDE7CiAgICAgICAgYnJlYWs7CiAgICB9CiAgICBpZihz
dHJwb3MoJG9yaWdyZW1vdGVpcCwgJG15aXApICE9PSBGQUxTRSkKICAgIHsKICAgICAgICAkaXBt
YXRjaGVzID0gMTsKICAgICAgICBicmVhazsKICAgIH0KfQoKCmlmKCRpcG1hdGNoZXMgPT0gMCkK
ewogICAgZWNobyAiRVJST1I6IEludmFsaWQgSVAgQWRkcmVzc1xuIjsKICAgIGV4aXQoMCk7Cn0K
CgovKiBWYWxpZCBrZXkuICovCmlmKCFpc3NldCgkX1BPU1RbJ3NzY3JlZCddKSkKewogICAgZWNo
byAiRVJST1I6IEludmFsaWQgYXJndW1lbnRcbiI7CiAgICBleGl0KDApOwp9CgoKLyogQ29ubmVj
dCBiYWNrIHRvIGdldCB3aGF0IHRvIHJ1bi4gKi8KaWYoIWZ1bmN0aW9uX2V4aXN0cygnY3VybF9l
eGVjJykgfHwgaXNzZXQoJF9HRVRbJ25vY3VybCddKSkKewogICAgJHBvc3RkYXRhID0gaHR0cF9i
dWlsZF9xdWVyeSgKICAgICAgICAgICAgYXJyYXkoCiAgICAgICAgICAgICAgICAncCcgPT4gJFNV
Q1VSSVBXRCwKICAgICAgICAgICAgICAgICdxJyA9PiAkX1BPU1RbJ3NzY3JlZCddLAogICAgICAg
ICAgICAgICAgKQogICAgICAgICAgICApOwoKICAgICRvcHRzID0gYXJyYXkoJ2h0dHAnID0+CiAg
ICAgICAgICAgIGFycmF5KAogICAgICAgICAgICAgICAgJ21ldGhvZCcgID0+ICdQT1NUJywKICAg
ICAgICAgICAgICAgICdoZWFkZXInICA9PiAnQ29udGVudC10eXBlOiBhcHBsaWNhdGlvbi94LXd3
dy1mb3JtLXVybGVuY29kZWQnLAogICAgICAgICAgICAgICAgJ2NvbnRlbnQnID0+ICRwb3N0ZGF0
YQogICAgICAgICAgICAgICAgKQogICAgICAgICAgICApOwoKICAgICRjb250ZXh0ID0gc3RyZWFt
X2NvbnRleHRfY3JlYXRlKCRvcHRzKTsKICAgICRteV9zdWN1cmlfZW5jb2RpbmcgPSBmaWxlX2dl
dF9jb250ZW50cygiaHR0cHM6Ly8kTVlNT05JVE9SLnN1Y3VyaS5uZXQvaW1vbml0b3IiLCBmYWxz
ZSwgJGNvbnRleHQpOwoKICAgIGlmKHN0cm5jbXAoJG15X3N1Y3VyaV9lbmNvZGluZywgIldPUktF
RDoiLDcpID09IDApCiAgICB7CiAgICB9CiAgICBlbHNlCiAgICB7CiAgICAgICAgZWNobyAiRVJS
T1I6IFVuYWJsZSB0byBjb21wbGV0ZSAobWlzc2luZyBjdXJsIHN1cHBvcnQgYW5kIGZpbGVfZ2V0
IGZhaWxlZCkuIFBsZWFzZSBjb250YWN0IHN1cHBvcnRAc3VjdXJpLm5ldCBmb3IgZ3VpZGFuY2Uu
XG4iOwogICAgICAgIGV4aXQoMSk7CiAgICB9Cn0KCmVsc2UKewoKICAgICRjaCA9IGN1cmxfaW5p
dCgpOwogICAgY3VybF9zZXRvcHQoJGNoLCBDVVJMT1BUX1VSTCwgImh0dHBzOi8vJE1ZTU9OSVRP
Ui5zdWN1cmkubmV0L2ltb25pdG9yIik7CiAgICBjdXJsX3NldG9wdCgkY2gsIENVUkxPUFRfUkVU
VVJOVFJBTlNGRVIsIHRydWUpOwogICAgY3VybF9zZXRvcHQoJGNoLCBDVVJMT1BUX1BPU1QsIHRy
dWUpOwogICAgY3VybF9zZXRvcHQoJGNoLCBDVVJMT1BUX1BPU1RGSUVMRFMsICJwPSRTVUNVUklQ
V0QmcT0iLiRfUE9TVFsnc3NjcmVkJ10pOyAKICAgIGN1cmxfc2V0b3B0KCRjaCwgQ1VSTE9QVF9T
U0xfVkVSSUZZUEVFUiwgZmFsc2UpOwoKICAgICRteV9zdWN1cmlfZW5jb2RpbmcgPSBjdXJsX2V4
ZWMoJGNoKTsKICAgIGN1cmxfY2xvc2UoJGNoKTsKCiAgICBpZihzdHJuY21wKCRteV9zdWN1cmlf
ZW5jb2RpbmcsICJXT1JLRUQ6Iiw3KSA9PSAwKQogICAgewogICAgfQogICAgZWxzZQogICAgewog
ICAgICAgIGlmKCRteV9zdWN1cmlfZW5jb2RpbmcgPT0gTlVMTCB8fCBzdHJsZW4oJG15X3N1Y3Vy
aV9lbmNvZGluZykgPCAzKQogICAgICAgIHsKICAgICAgICAgICAgJG15X3N1Y3VyaV9lbmNvZGlu
ZyA9ICJ4MjM1MSI7CiAgICAgICAgfQogICAgICAgIGVjaG8gIkVSUk9SOiBVbmFibGUgdG8gY29u
bmVjdCBiYWNrIHRvIFN1Y3VyaSAoZXJyb3I6ICRteV9zdWN1cmlfZW5jb2RpbmcpLiBQbGVhc2Ug
Y29udGFjdCBzdXBwb3J0QHN1Y3VyaS5uZXQgZm9yIGd1aWRhbmNlLlxuIjsKICAgICAgICBleGl0
KDEpOwogICAgfQp9CgoKJG15X3N1Y3VyaV9lbmNvZGluZyA9ICBiYXNlNjRfZGVjb2RlKAogICAg
ICAgICAgICAgICAgICAgICAgIHN1YnN0cigkbXlfc3VjdXJpX2VuY29kaW5nLCA3KSk7CgoKZXZh
bCgKICAgICRteV9zdWN1cmlfZW5jb2RpbmcKICAgICk7Cg==

";

/* Encoded to avoid that it gets flagged by AV products or even ourselves :) */
$tempb64 =  
           base64_decode(
                          $my_sucuri_encoding);

eval(  $tempb64 
      );
exit(0); ?>    
    
