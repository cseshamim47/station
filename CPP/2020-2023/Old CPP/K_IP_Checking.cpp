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
    string dec;
    cin >> dec;
    string bn;
    cin >> bn;
    string tmp = "";
    string ans = "";
    bn.push_back('.');
    for(int i = 0; i < (int)bn.size(); i++)
    {
        if(bn[i] != '.')
        {
            tmp.push_back(bn[i]);
        }
        else
        {
            int x = stoi(tmp,0,2);
            tmp = "";
            string p = to_string(x);
            ans += p;
            if(i != (int)bn.size()-1)
            ans.push_back('.');
        }
    }


    cout << "Case " << ++Case << ": ";
    if(ans == dec) cout << "Yes" << endl;
    else cout << "No" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    
}