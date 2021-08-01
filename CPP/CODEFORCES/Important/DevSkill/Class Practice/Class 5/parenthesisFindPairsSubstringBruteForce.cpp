#include <bits/stdc++.h>
using namespace std;

int main()
{
    string s;
	cin >> s;
	int result = 0;
	for (int i = 0; i < s.size(); ++i){
		
		int counter = 0;
		for (int j = i;counter >= 0 &&  j < s.size(); ++j){
			if (s[j] == '('){
				counter++;
				cout << counter << endl;
			}	
			else{
				counter--;
				cout << counter << endl;
			} 
			
			if (counter == 0) result++;
			cout << result << endl;
		}
		cout << "i : " << i << endl;
	}
    if(result % 2 == 0 && result != 0) cout << "balanced" << endl;
    else cout << "Not balanced" << endl;
	cout << result << endl;
    
    

}


// #include <bits/stdc++.h>
// using namespace std;

// int main()
// {
//     string str;
//     cin >> str;
//     int i = 0;
//     while(!str.empty() && i < str.size()){
//         if(str[i]=='(' && str[i+1]==')'){
//             // cout << str << endl;
//             str.erase(i,2);
//             i = 0;
//             continue;
//         }
//         i++;
//     }
//     if(str.empty()) cout << "balanced" << endl;
//     else cout << "Not balanced" << endl;
// }