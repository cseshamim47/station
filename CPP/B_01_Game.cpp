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
    int ps = str.size();

    int alice = 0,bob = 0;
    bool idk = true;
    int cnt = 0;
    while(idk && str.size() != 0)
    {
        idk = false;
        ps = str.size();
        for(int i = 0; i < str.size(); i++)
        {
            if((str[i] == '0' && str[i-1] == '1') || (str[i] == '1' && str[i-1] == '0'))
            {
                idk = true;
                break;
            }
        }
        for(int i = 1; i < str.size(); i++)
        {
            if(str[i] == '0' && str[i-1] == '1')
            {
                str.erase(i-1,2);
                break;
            }
            if(str[i] == '1' && str[i-1] == '0')
            {
                str.erase(i-1,2);
                break;
            }
        }
        if(ps != str.size())
        {
            if(cnt % 2 == 0) alice++;
            else bob++;

            cnt++;
        }  
    }

    if(alice > bob) cout << "DA" << endl;
    else cout << "NET" << endl;   
    
}
int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}