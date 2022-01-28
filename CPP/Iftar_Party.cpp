#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

int Case;
void solve()
{
   int p,l;
   cin >> p >> l;
   int a = p-l;
   set<int> st;
   cout << "Case " << ++Case << ": ";
   if(a > l)
   {
       for(int i = 1; i * i <= a; i++)
       {
           if(a % i == 0)
           {
                if(a/i == i) st.insert(i);
                else
                {
                    if(i > l) st.insert(i);
                    if(a/i > l) st.insert(a/i);
                }
           }
       }
       for(auto s : st)
       {
           cout << s << " ";
       }
   }
   else cout << "impossible";

   cout << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}