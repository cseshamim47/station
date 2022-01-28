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
    int arr[n];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
	int p = 0;
	int mx = -1;
    for(int i = 0; i < n; i++)
    {
        if(arr[i] % 2 == 0)
		{
			while(arr[i] % 2 == 0)
			{
				arr[i] /= 2;
				p++;
			}
		}
		mx = max(mx,arr[i]);
    }

	int ans = powl(2,p)*mx;
	for(int i = 0; i < n; i++)
	{
		if(arr[i] == mx)
		{
			mx = -1;
			continue;
		}
		ans += arr[i];
	}
	cout << ans << endl;
}

int32_t main()
{
	  //        Bismillah
	// BOOST
	w(t)
	//solve();
}