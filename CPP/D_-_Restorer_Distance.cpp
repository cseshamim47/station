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

void bruteforce()
{}
int a, r, m;
int f(vector<int> &v, int k)
{
    int need = 0,extra = 0;

    for(int i = 0; i < v.size(); i++)
    {
        if(v[i] < k)
        {
            need += (k-v[i]);
        }else if(v[i] > k)
        {
            extra += (v[i]-k);
        }
    }

    int c1 = need*a + extra*r;
    
    int mn = min(need,extra);

    need-=mn;
    extra-=mn;

    int c2 = mn*m + need*a + extra*r;

    return min(c1,c2);
}

void solve()
{
    int n;
    cin >> n >> a >> r >> m;
    vector<int> v;
    for(int i = 0; i < n; i++)
    {
        int x;
        cin >> x;
        v.push_back(x);
    }

    sort(all(v));

    int l = v[0];
    int h = v[s(v)-1];
    int ans = LLONG_MAX;
    int itr = 50;
    while(itr--)
    {
        int m1 = l+ (h-l)/3;
        int m2 = l+ 2*(h-l)/3;
    
        int x = f(v,m1);
        int y = f(v,m2);

        if(x < y)
        {
            h = m2;
        }else
        {
            l = m1;
        }
        ans = min({x,y,ans});
    }

    for(int i = l; i<=h; i++)
    {
        ans = min(ans,f(v,i));
    }
    cout << ans << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
    //bruteforce();
}