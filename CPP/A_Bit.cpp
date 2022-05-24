#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006
int cnt;
void solve()
{
    string str;
    cin >> str;
    if(str == "X++" || str == "++X")
    {
        cnt++;
    }else cnt--;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    cout << cnt << endl;
    //solve();
}