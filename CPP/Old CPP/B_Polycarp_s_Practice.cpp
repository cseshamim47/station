#include <bits/stdc++.h>
using namespace std;

#define fo(i,n) for(i=0;i<n;i++)
#define deb(x) cout << #x << "=" << x << endl
#define deb2(x, y) cout << #x << "=" << x << "," << #y << "=" << y << endl
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

int Case;
void solve()
{
    int i,j,m,n;
    n = in, m = in;
    vector<pair<int,int>> v;
    int arr[n];
    fo(i,n)
    {
        j = in;
        arr[i] = j;
        v.push_back({j,i});
    }
    sort(v.begin(),v.end());
    int sum = 0;
    vector<int> vv;
    i = s(v)-1;
    int k = m;
    while(m--)
    {
        sum += v[i].first;
        vv.push_back(v[i].first);
        i--;
    }
    sort(all(vv));
    cout << sum << endl;

    int prev = 0;

    for(int i = 0; i < n; i++)
    {
        if(k == 1) break;
        for(int j = 0; j < s(vv); j++)
        {
            if(arr[i] == vv[j])
            {
                cout << i+1-prev << " ";
                prev = i+1;
                vv[j] = -1;
                k--;
                break;
            }
        }
    }
    cout << n - prev << endl;

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