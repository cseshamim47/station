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
    string s1,s2;
    cin >> s1 >> s2;

    int cnt = 0;
    for(int i = 0; i < n; i++)
    {
        if(s1[i] != s2[i]) cnt+=2;
        else if(s1[i] == '1' && s2[i] == '1') 
        {
            if(i+1 != n && (s1[i+1] == '0' || s2[i+1] == '0')) cnt+=2,i++;
        }else if(s1[i] == '0' && s2[i] == '0') 
        {
            if(i+1 != n && (s1[i+1] == '1' && s2[i+1] == '1')) cnt+=2,i++;
            else cnt++;
        }
    }
    cout << cnt << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}