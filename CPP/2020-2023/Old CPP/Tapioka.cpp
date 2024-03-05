#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    string str[3];
    cin >> str[0] >> str[1] >> str[2];
    int cnt = 0;
    for(int i = 0; i < 3; i++)
    {
        if(str[i] == "tapioka" || str[i] == "bubble") continue;
        else
        {
            cnt++;
            cout << str[i] << " ";
        }
    }
    if(!cnt) cout << "nothing" << endl;
    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}