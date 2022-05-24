#include <bits/stdc++.h>
using namespace std;

#define fo(i,n) for(i=0;i<n;i++)
#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

void fileInput()
{
    #ifndef ONLINE_JUDGE
        freopen("input.txt", "r", stdin);
        freopen("output.txt", "w", stdout);
    #endif
}

int gcd(int a, int b)
{
    if(!b) return a;
    return gcd(b,a%b);
}

void f()
{}


bool cmp(pair<int,int> a, pair<int,int> b)
{
    return a.second < b.second;
}

int Case;
void solve()
{
    int i,j,m,n;
    n = in;
    int pic = in, par = in;
    vector<pair<int,int> > v;
    vector<pair<int,int> > q;

    fo(i,pic)
    {
        int x = in;
        int y = in;
        v.push_back({x,y});
    }  

    fo(i,par)
    {
        int x = in;
        int y = in;
        q.push_back({x,y});
    }  

    sort(all(v),cmp);

    // for(auto x : v) cout << x.first << " " << x.second << endl;

    for(int i = 0; i < par; i++)
    {
        int x = q[i].first;
        int y = q[i].second;

        bool ok = true;
        while(ok)
        {
            int lb = lower_bound(v.begin(),v.end(),q[i])-v.begin();
            if(lb != pic)
            {
                cout << v[lb].first << " " << v[lb].second << endl;
            }else cout << "No" << endl;
        }
    }


}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}