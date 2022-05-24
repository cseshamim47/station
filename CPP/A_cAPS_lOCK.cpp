#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    string str;
    cin >> str;
    int l = 0, u = 0;
    for(int i = 0; i < str.size(); i++)
    {
        if(islower(str[i])) l++; 
    }
    // cout << l << endl;
    if((l == 1 && islower(str[0])) || l == 0)
    {
        if(islower(str[0]))
        {
            transform(str.begin(),str.end(),str.begin(),::tolower);
            str[0] = toupper(str[0]);
        }else
            transform(str.begin(),str.end(),str.begin(),::tolower);

    }
    cout << str << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}