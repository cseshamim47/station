#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
   int n;
   cin >> n;
   int f[5]={0};
   for(int i = 0; i < n; i++)
   {
       int x;
       cin >> x;
       f[x]++;
   }
   int cnt = f[4];
   while(f[3] != 0 && f[1] != 0)
   {
       cnt++;
       f[3]--;
       f[1]--;
   }
   if(f[3] != 0)
   {
       cnt += f[3];
   }
   cnt += (f[2]/2);
   if(f[2] % 2 != 0)
   {
       f[2] %= 2;
   }else f[2] = 0;
   
   if(f[2] != 0 && f[1] > 0)
   {
       f[2]--;
       f[1]-=2;
       cnt++;
   }
   if(f[1] < 0) f[1] = 0;
   if(f[2] != 0) cnt++;

   cnt += (f[1]/4);
   if(f[1] % 4 != 0)
   {
        f[1] %= 4;
   }else f[1] = 0;

   if(f[1] != 0) cnt++;

   cout << cnt << endl;


}

int32_t main()
{
    solve();
}