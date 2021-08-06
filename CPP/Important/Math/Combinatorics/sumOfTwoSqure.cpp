#include <bits/stdc++.h>
using namespace std;
#define ll long long

vector<ll> primeFactors(ll n)
{
    vector<ll> PF;
	while (n % 2 == 0)
	{
		PF.push_back(2);
//		cout << 2 << " ";
		n = n/2;
	}

	for (int i = 3; i <= sqrt(n); i = i + 2)
	{

		while (n % i == 0)
		{
			PF.push_back(i);
//			cout << i << " ";
			n = n/i;
		}
	}

	if (n > 2)
    {
//		cout << n << " ";
        PF.push_back(n);
	}

	return PF;
}

/// no prime(odd power) congruent 3 (mod 4)

void solve()
{

    ll n;
    cin >> n;
    vector<ll> PF = primeFactors(n);
    ll size = PF.size();
    ll track = 0;
    for(int i = 0; i < size; i++)
    {
        if(track != PF[i])
        {
            ll cnt = upper_bound(PF.begin(),PF.end(),PF[i]) - lower_bound(PF.begin(),PF.end(),PF[i]);
//            cout << PF[i] << " " << cnt << endl;
            if(cnt & 1)
            {
                if(PF[i] % 4 == 3 && (PF[i]-3)%4 == 0)
                {
                     cout << "No\n";
                     return;
                }
            }
            track = PF[i];
        }
    }
    cout << "Yes\n";
}
int main()
{
	int n;
	cin >> n;
	while(n--)
    {
        solve();
    }
	return 0;
}
