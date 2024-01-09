#include<iostream>
#include<cmath>
using namespace std;

int maxSquareness(int n, int a[]) {
    int counter = 0;
    for (int i = 0; i < n; i++) {
        int ai = a[i];
        int x = sqrt(ai);
        counter += (x*x) - ai;
    }
    return counter;
}

int main() {
    int t;
    cin >> t;
    while (t--) {
        int n;
        cin >> n;
        int a[n];
        for (int i = 0; i < n; i++) {
            cin >> a[i];
        }
        cout << maxSquareness(n, a) << endl;
    }
    return 0;
}
