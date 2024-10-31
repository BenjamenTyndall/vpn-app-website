import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class OpenVPNConnector {

    public static void main(String[] args) {
        if (args.length != 4) {
            System.out.println("Usage: java OpenVPNConnector <username> <password> <serverPort> <protocol>");
            return;
        }

        String username = args[0];
        String password = args[1];
        int serverPort = Integer.parseInt(args[2]);
        String protocol = args[3];

        try {
            // Build the OpenVPN command based on the arguments
            String openvpnCommand = "openvpn --remote " + username + " " + password + " " + serverPort + " --proto " + protocol;

            // Execute the OpenVPN command
            ProcessBuilder processBuilder = new ProcessBuilder(openvpnCommand.split(" "));
            Process process = processBuilder.start();

            // Read output from OpenVPN process (optional)
            BufferedReader reader = new BufferedReader(new InputStreamReader(process.getInputStream()));
            String line;
            while ((line = reader.readLine()) != null) {
                System.out.println(line);
            }

            // Wait for the OpenVPN process to complete (blocking)
            int exitCode = process.waitFor();
            System.out.println("OpenVPN process exited with code: " + exitCode);

        } catch (IOException | InterruptedException | NumberFormatException e) {
            e.printStackTrace();
        }
    }
}
