# 5.
gbak -b Najemvozil.fdb NajemvozilFB.fbk

# 6.
nbackup -B 0 Najemvozil.fdb NajemvozilFB_inc.nbk

nbackup -B 1 Najemvozil.fdb NajemvozilFB_inc_2.nbk

nbackup -R Najemvozil.fdb NajemvozilFB.fbk NajemvozilFB_inc_2.nbk

# 7.

nbackup -B 1 Najemvozil.fdb NajemvozilFB_inc_3.nbk

nbackup -R Najemvozil.fdb NajemvozilFB.fbk NajemvozilFB_inc_2.nbk NajemvozilFB_inc_3.nbk
