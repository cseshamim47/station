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
    n = in;
    vector<int> arr(n);
    for(int i= 0; i < n; i++) arr[i] = in;

    int l = 0;
    int r = n-1;

    while(l < r) 
    {
        if(arr[l] > 0 && arr[r] < 0)
        {
            arr[l] *= -1;
            arr[r] *= -1;
            l++;
            r--;
        }else if(arr[l] > 0) r--;
        else l++;
    }

    for(int i= 0; i+1 < n; i++) 
    {
        if(arr[i] <= arr[i+1]) continue;
        else 
        {
            cout << "NO" << endl;
            return;
        }
    }

    cout << "YES" << endl;


}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    w(t)
    // solve();
    // f();
}