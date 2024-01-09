#include <bits/stdc++.h>
using namespace std;

typedef long long ll;

ll gcd(ll a, ll b) {
  if (b == 0) return a;
  return gcd(b, a % b);
}

int main() {
  int t;
  cin >> t;
  while (t--) {
    int n;
    cin >> n;
    vector<ll> a(n);
    for (int i = 0; i < n; i++) cin >> a[i];

    bool found = false;
    for (int i = 0; i < n; i++) {
      for (int j = i + 1; j < n; j++) {
        ll g = gcd(a[i], a[j]);
        if (g > 1) {
          found = true;
          break;
        }
      }
      if (found) break;
    }

    if (found) cout << "NO" << endl;
    else cout << "YES" << endl;
  }

  return 0;
}
