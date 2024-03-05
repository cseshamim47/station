#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n , m;
    cin >> n >> m;
    int c = n*m;
    int minus = 0;
    int arr[c];
    for(int i = 0; i < c; i++)
    {
        cin >> arr[i];
        if(arr[i] < 0)
        {
            arr[i]*=-1;
            minus++;
        }
    }
    minus%=2;

    sort(arr,arr+c);
    int sum = 0;
    int i = 0;
    while(c--)
    {
        if(minus)
        {
            if(arr[i] < 0) sum += arr[i];
            else sum -= arr[i];
            minus--;
        }else sum += arr[i];
        i++;
    }
    cout << sum << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}