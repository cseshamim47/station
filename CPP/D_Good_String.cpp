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
    string str;
    cin >> str;
    if(str[0] == '<' && str[n-1] == '>')
    {
        int a = 0;
        int b = 0;
        for(int i = 0; i < n; i++) 
            if(str[i] != '>') a++;
            else break;
        for(int i = n-1; i >=0; i--)
            if(str[i] != '<') b++;
            else break;
        cout << min(a,b) << endl;
    }
    else cout << 0 << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    
}