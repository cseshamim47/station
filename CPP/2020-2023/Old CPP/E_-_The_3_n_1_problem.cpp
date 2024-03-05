#include <bits/stdc++.h>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

vector<int> ans; 
int tot;
void f(int n)
{
    int k = n;
    vector<int> v;
    while(n >= 1)
    {
        if(n == 1)
        {
            v.push_back(n);
            break;
        }
        if(n%2 == 0) 
        {
            v.push_back(n);
            n/=2;
        }else
        {
            v.push_back(n);
            n = 3*n + 1;
        }
        tot++;
    }
    ans.push_back(v.size());

}

void bruteforce()
{

}

int Case;
void solve()
{
    
    for(int i = 1; i <= 1000006; i++)
    {
        f(i);
    }    

    for(int i = 1; i <= 20; i++)
    {
        cout << ans[i-1] << endl;
    }
    // cout << tot << endl;
    int a,b;
    while(cin >> a >> b)
    {
        int cnt = 0;
        int x = a,y = b;
        if(a>b) swap(a,b);
        for(int i = a; i <= b; i++)
        {
            int x = ans[i-1];
            cnt = max(cnt,x);
        }
        cout << x << " " << y << " " << cnt << endl;
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // bruteforce();
    // w(t)
    solve();
}