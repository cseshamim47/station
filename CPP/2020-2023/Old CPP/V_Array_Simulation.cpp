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
    int n,m;
    cin >> n >> m;
    int arr[n];
    for(int i = 0; i < n; i++) cin >> arr[i];
    while(m--)
    {
        char ch;
        int x;
        cin >> ch;
        if(ch == 'S')
        {
            cin >> x;
            for(int i = 0; i < n; i++) arr[i] += x;
        }else if(ch == 'M')
        {
            cin >> x;
            for(int i = 0; i < n; i++) arr[i] *= x;
        }else if(ch == 'D')
        {
            cin >> x;
            for(int i = 0; i < n; i++) arr[i] /= x;
        }else if(ch == 'P')
        {
            int y;
            cin >> x >> y;
            swap(arr[x],arr[y]);
        }else
        {
            reverse(arr,arr+n);
        }
    }

    cout << "Case " << ++Case << ": " << endl;
    for(int i = 0; i < n; i++)
    {
        cout << arr[i];
        if(i != n-1) cout << " ";
    }
    cout << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    
}